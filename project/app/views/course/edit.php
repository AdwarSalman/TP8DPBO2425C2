<!DOCTYPE html>
<html>
<head>
  <title>Edit Course</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body class="p-4">
  <h2>Edit Course</h2>
  <form method="post" action="index.php?controller=course&action=edit" class="col-md-6">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
      <label>Course Name</label>
      <input type="text" name="course_name" value="<?= htmlspecialchars($data['course_name']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Course Code</label>
      <input type="text" name="course_code" value="<?= htmlspecialchars($data['course_code']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Lecturer</label>
      <select name="lecturer_id" class="form-select" required>
        <?php while ($row = $lecturers->fetch(PDO::FETCH_ASSOC)) : ?>
          <option value="<?= $row['id'] ?>" <?= $data['lecturer_id'] == $row['id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($row['name']) ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="index.php?controller=course&action=index" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
