<!DOCTYPE html>
<html>
<head>
  <title>Edit Lecturer</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body class="p-4">
  <h2>Edit Lecturer</h2>
  <form method="post" action="index.php?controller=lecturer&action=edit" class="col-md-6">
    <input type="hidden" name="id" value="<?= $data['id'] ?>">

    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>NIDN</label>
      <input type="text" name="nidn" value="<?= htmlspecialchars($data['nidn']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Join Date</label>
      <input type="date" name="join_date" value="<?= htmlspecialchars($data['join_date']) ?>" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="index.php?controller=lecturer&action=index" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
