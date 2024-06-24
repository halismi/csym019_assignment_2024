document.addEventListener("DOMContentLoaded", function() {
    loadCourses();

    // Function to load courses from server using XMLHttpRequest
    function loadCourses() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'course.json', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var courses = data.courses;
                var tableBody = document.getElementById('course-table-body');
                
                // Clear previous data
                tableBody.innerHTML = '';

                // Populate table with course data
                courses.forEach(course => {
                    var row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${course.id}</td>
                        <td>${course.course_name}</td>
                        <td>${course.level}</td>
                        <td>${course.duration}</td>
                        <td>${course.overview}</td>
                        <td>${course.highlights}</td>
                        <td>${course.course_details}</td>
                        <td>${course.entry_requirements}</td>
                        <td>£${course.fees_and_funding.GBP}</td>
                        <td>€${course.fees_and_funding.EUR}</td>
                        <td>$${course.fees_and_funding.USD}</td>
                        <td>${course.funding_available ? 'Yes' : 'No'}</td>
                        <td>${course.accreditation}</td>
                        <td>${course.student_perks}</td>
                        <td>${course.faqs}</td>
                        <td><img src="${course.image_url}" class="course-image"></td>
                        
                     `;
                    tableBody.appendChild(row);
                });

                // Set timeout to reload the courses after 24 hours
                setTimeout(loadCourses, 24 * 60 * 60 * 1000);
            }
        };
        xhr.send();
    }

    // Initial load
    loadCourses();
});
