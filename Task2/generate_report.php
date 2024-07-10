<?php
include 'db.php';

$selected_courses = isset($_POST['course_ids']) ? $_POST['course_ids'] : [];

// Initialize arrays to hold data for the charts
$course_data = [];
$module_data = [];

if (!empty($selected_courses)) {
    foreach ($selected_courses as $course_id) {
        // Fetch course details
        $course_sql = "SELECT * FROM courses WHERE id = $course_id";
        $course_result = $conn->query($course_sql);

        if ($course_result->num_rows > 0) {
            while ($course_row = $course_result->fetch_assoc()) {
                $course_data[$course_id] = [
                    'name' => $course_row['course_name'],
                    'level' => $course_row['level'],
                    'duration' => $course_row['duration'],
                    'overview' => $course_row['overview'],
                    'highlights' => $course_row['highlights'],
                    'course_details' => $course_row['course_details'],
                    'entry_requirements' => $course_row['entry_requirements'],
                    'fees_gbp' => $course_row['fees_and_funding_GBP'],
                    'fees_eur' => $course_row['fees_and_funding_EUR'],
                    'fees_usd' => $course_row['fees_and_funding_USD'],
                    'faqs' => $course_row['faqs'],
                    'image_url' => $course_row['image_url']
                ];

                // Fetch modules for the course
                $module_sql = "SELECT module_name, credits FROM course_modules WHERE course_id = $course_id";
                $module_result = $conn->query($module_sql);

                if ($module_result->num_rows > 0) {
                    while ($module_row = $module_result->fetch_assoc()) {
                        $module_data[$course_id][] = [
                            'module_name' => $module_row['module_name'],
                            'credits' => $module_row['credits']
                        ];
                    }
                }
            }
        }
    }
} else {
    echo "<p>No courses selected.</p>";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Report</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header>
        <h1>Selected Courses Report</h1>
    </header>

    <div class="container">
        <?php foreach ($course_data as $course_id => $course): ?>
            <div class="report-container">
                <h2><?php echo htmlspecialchars($course['name']); ?></h2>
                <p><strong>Level:</strong> <?php echo htmlspecialchars($course['level']); ?></p>
                <p><strong>Duration:</strong> <?php echo htmlspecialchars($course['duration']); ?></p>
                <p><strong>Overview:</strong> <?php echo htmlspecialchars($course['overview']); ?></p>
                <p><strong>Highlights:</strong> <?php echo htmlspecialchars($course['highlights']); ?></p>
                <p><strong>Course Details:</strong> <?php echo htmlspecialchars($course['course_details']); ?></p>
                <p><strong>Entry Requirements:</strong> <?php echo htmlspecialchars($course['entry_requirements']); ?></p>
                <p><strong>Fees (GBP):</strong> <?php echo htmlspecialchars($course['fees_gbp']); ?></p>
                <p><strong>Fees (EUR):</strong> <?php echo htmlspecialchars($course['fees_eur']); ?></p>
                <p><strong>Fees (USD):</strong> <?php echo htmlspecialchars($course['fees_usd']); ?></p>
                <p><strong>FAQs:</strong> <?php echo htmlspecialchars($course['faqs']); ?></p>
                <img src="<?php echo htmlspecialchars($course['image_url']); ?>" alt="<?php echo htmlspecialchars($course['name']); ?>" width="200"><br>

                <h3>Modules</h3>
                <ul>
                    <?php foreach ($module_data[$course_id] as $module): ?>
                        <li><?php echo htmlspecialchars($module['module_name']) . " - Credits: " . htmlspecialchars($module['credits']); ?></li>
                    <?php endforeach; ?>
                </ul>

                <!-- Pie Chart for Modules -->
                <canvas id="pieChart<?php echo $course_id; ?>" width="200" height="200"></canvas>
                <script>
                    var ctx = document.getElementById('pieChart<?php echo $course_id; ?>').getContext('2d');
                    var pieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: <?php echo json_encode(array_column($module_data[$course_id], 'module_name')); ?>,
                            datasets: [{
                                data: <?php echo json_encode(array_column($module_data[$course_id], 'credits')); ?>,
                                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'],
                            }]
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'Modules Distribution for <?php echo addslashes($course['name']); ?>'
                            }
                        }
                    });
                </script>
            </div>
        <?php endforeach; ?>

        <?php if (count($course_data) > 1): ?>
            <div class="report-container">
                <h2>Comparison of Selected Courses</h2>
                <canvas id="barChart" width="800" height="400"></canvas>
                <?php
                $labels = [];
                $datasets = [];

                $colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'];
                $colorIndex = 0;
                foreach ($module_data as $course_id => $modules) {
                    foreach ($modules as $module) {
                        if (!in_array($module['module_name'], $labels)) {
                            $labels[] = $module['module_name'];
                        }
                    }
                }
                foreach ($course_data as $course_id => $course) {
                    $data = [];
                    foreach ($labels as $label) {
                        $found = false;
                        foreach ($module_data[$course_id] as $module) {
                            if ($module['module_name'] == $label) {
                                $data[] = $module['credits'];
                                $found = true;
                                break;
                            }
                        }
                        if (!$found) {
                            $data[] = 0;
                        }
                    }
                    $datasets[] = [
                        'label' => $course['name'],
                        'data' => $data,
                        'backgroundColor' => $colors[$colorIndex % count($colors)]
                    ];
                    $colorIndex++;
                }
                ?>

                <script>
                    var ctx = document.getElementById('barChart').getContext('2d');
                    var barChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo json_encode($labels); ?>,
                            datasets: <?php echo json_encode($datasets); ?>
                        },
                        options: {
                            title: {
                                display: true,
                                text: 'Comparison of Modules Across Selected Courses'
                            },
                            scales: {
                                xAxes: [{
                                    stacked: true
                                }],
                                yAxes: [{
                                    stacked: true
                                }]
                            }
                        }
                    });
                </script>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
