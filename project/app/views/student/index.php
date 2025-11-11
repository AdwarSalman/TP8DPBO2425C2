<!DOCTYPE html>
<html>
<head>
  <title>Students</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body class="p-4">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php?controller=student&action=index">Students</a>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php?controller=lecturer&action=index">Lecturers</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php?controller=course&action=index">Courses</a></li>
      </ul>
    </div>
  </nav>

  <a href="index.php?controller=student&action=create" class="btn btn-primary mb-3">Add New Student</a>

  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>ID</th><th>Name</th><th>NIM</th><th>Email</th><th>Course</th><th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $data->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= htmlspecialchars($row['nim']) ?></td>
          <td><?= htmlspecialchars($row['email']) ?></td>
          <td><?= htmlspecialchars($row['course_name'] ?? '-') ?></td>
          <td>
            <a href="index.php?controller=student&action=edit&id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="index.php?controller=student&action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm"
               onclick="return confirm('Delete this student?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
