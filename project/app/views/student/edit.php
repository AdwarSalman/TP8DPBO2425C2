<!DOCTYPE html>
<html>
<head>
  <title>Edit Student</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body class="p-4">
  <h2>Edit Student</h2>
  <form method="post" action="index.php?controller=student&action=edit" class="col-md-6">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>NIM</label>
      <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Course</label>
      <select name="course_id" class="form-select" required>
        <?php while ($row = $courses->fetch(PDO::FETCH_ASSOC)) : ?>
          <option value="<?= $row['id'] ?>" <?= $data['course_id'] == $row['id'] ? 'selected' : '' ?>>
            <?= htmlspecialchars($row['course_name']) ?>
          </option>
        <?php endwhile; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="index.php?controller=student&action=index" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
