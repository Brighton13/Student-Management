<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <!-- Panel with student information -->
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Student Information</h3>
        </div>
        <div class="panel-body">
          <!-- Your student information here -->
          <table class="table">
            <thead>
              <tr>
                <th>Student ID</th>
                <th>Name</th>
                <!-- Add more table headers as needed -->
              </tr>
            </thead>
            <tbody id="studentTableBody">
              <!-- Student information will be dynamically inserted here -->
            </tbody>
          </table>
        </div>
        <div class="panel-footer text-right">
          <!-- Pagination component -->
          <nav aria-label="Page navigation">
            <ul class="pagination" id="pagination">
              <!-- Pagination links will be dynamically inserted here -->
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
// Sample student data
const students = [
  { id: 1, name: 'Student 1' },
  { id: 2, name: 'Student 2' },
  // Add more student objects as needed
];

// Function to render student table
function renderStudentTable(pageNumber, pageSize) {
  const startIndex = (pageNumber - 1) * pageSize;
  const endIndex = Math.min(startIndex + pageSize, students.length);
  const tableBody = document.getElementById('studentTableBody');
  tableBody.innerHTML = '';

  for (let i = startIndex; i < endIndex; i++) {
    const student = students[i];
    const row = `<tr><td>${student.id}</td><td>${student.name}</td></tr>`;
    tableBody.innerHTML += row;
  }
}

// Function to render pagination links
function renderPagination(pageNumber, pageSize) {
  const totalPages = Math.ceil(students.length / pageSize);
  const pagination = document.getElementById('pagination');
  pagination.innerHTML = '';

  for (let i = 1; i <= totalPages; i++) {
    const li = document.createElement('li');
    li.classList.add('page-item');
    const link = document.createElement('a');
    link.classList.add('page-link');
    link.href = '#';
    link.textContent = i;
    li.appendChild(link);

    link.addEventListener('click', () => {
      renderStudentTable(i, pageSize);
    });

    pagination.appendChild(li);
  }
}

// Initial render
const pageSize = 10; // Number of rows per page
renderStudentTable(1, pageSize);
renderPagination(1, pageSize);
</script>