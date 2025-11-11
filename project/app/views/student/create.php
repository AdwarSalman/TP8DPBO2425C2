<!DOCTYPE html>
<html>
<head>
  <title>Add Student</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body class="p-4">
  <h2>Add New Student</h2>
  <form method="post" action="index.php?controller=student&action=create" class="col-md-6">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>NIM</label>
      <input type="text" name="nim" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Course</label>
      <select name="course_id" class="form-select" required>
        <option value="">-- Select Course --</option>
        <?php while ($row = $courses->fetch(PDO::FETCH_ASSOC)) : ?>
          <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['course_name']) ?></option>
        <?php endwhile; ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="index.php?controller=student&action=index" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
