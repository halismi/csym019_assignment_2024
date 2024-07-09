<?php
include 'db.php';

$selected_courses = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['select_all']) && $_POST['select_all'] == '1') {
        // Select all courses
        $sql = "SELECT * FROM courses ORDER BY course_name ASC";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $selected_courses[] = $row;
        }
    } else {
        // Select specific courses
        if (isset($_POST['course_ids'])) {
            $course_ids = $_POST['course_ids'];
            $ids = implode(",", array_map('intval', $course_ids));
            $sql = "SELECT * FROM courses WHERE id IN ($ids)";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $selected_courses[] = $row;
            }
        }
    }

    if (!empty($selected_courses)) {
        echo "<h2>Selected Courses Report</h2>";
        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Level</th>
                <th>Duration</th>
                <th>Overview</th>
                <th>Highlights</th>
                <th>Course Content - Details</th>
                <th>Course Content - Modules</th>
                <th>Credits</th>
                <th>Entry Requirements</th>
                <th>Fees (GBP)</th>
                <th>Fees (EUR)</th>
                <th>Fees (USD)</th>
                <th>FAQs</th>
                <th>Image</th>
            </tr>";
        foreach ($selected_courses as $course) {
            $modules = json_decode($course['modules'], true);
            echo "<tr>
                    <td>{$course['id']}</td>
                    <td>{$course['course_name']}</td>
                    <td>{$course['level']}</td>
                    <td>{$course['duration']}</td>
                    <td>{$course['overview']}</td>
                    <td>{$course['highlights']}</td>
                    <td>{$course['course_details']}</td>
                    <td>";
            foreach ($modules as $module) {
                echo "Module: {$module['module']}, Credits: {$module['credits']}<br>";
            }
            echo "</td>
                    <td>{$course['credits']}</td>
                    <td>{$course['entry_requirements']}</td>
                    <td>{$course['fees_and_funding_GBP']}</td>
                    <td>{$course['fees_and_funding_EUR']}</td>
                    <td>{$course['fees_and_funding_USD']}</td>
                    <td>{$course['faqs']}</td>
                    <td><img src='{$course['image_url']}' alt='{$course['course_name']}' width='100'></td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No courses selected for the report.</p>";
    }

    // Generate the charts
    if (!empty($selected_courses)) {
        echo "<h2>Course Modules Chart</h2>";
        echo "<canvas id='modulesChart'></canvas>";

        if (count($selected_courses) > 1) {
            echo "<h2>Comparison of Selected Courses</h2>";
            echo "<canvas id='comparisonChart'></canvas>";
        }
    }
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    <?php if (!empty($selected_courses)) : ?>
        // Data for the pie chart
        var moduleLabels = [];
        var moduleCredits = [];
        <?php foreach ($selected_courses as $course) : ?>
            var modules = <?php echo json_encode(json_decode($course['modules'], true)); ?>;
            modules.forEach(function(module) {
                moduleLabels.push(module.module);
                moduleCredits.push(module.credits);
            });
        <?php endforeach; ?>

        // Create pie chart for modules
        var ctx = document.getElementById('modulesChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: moduleLabels,
                datasets: [{
                    data: moduleCredits,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40']
                }]
            },
            options: {
                responsive: true
            }
        });

        <?php if (count($selected_courses) > 1) : ?>
            // Data for the bar chart
            var comparisonLabels = [];
            var comparisonData = [];

            <?php foreach ($selected_courses as $course) : ?>
                comparisonLabels.push('<?php echo $course['course_name']; ?>');
                var modules = <?php echo json_encode(json_decode($course['modules'], true)); ?>;
                var courseCredits = 0;
                modules.forEach(function(module) {
                    courseCredits += module.credits;
                });
                comparisonData.push(courseCredits);
            <?php endforeach; ?>

            // Create bar chart for comparison
            var ctxComparison = document.getElementById('comparisonChart').getContext('2d');
            new Chart(ctxComparison, {
                type: 'bar',
                data: {
                    labels: comparisonLabels,
                    datasets: [{
                        label: 'Total Credits',
                        data: comparisonData,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40']
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });
        <?php endif; ?>
    <?php endif; ?>
</script>
