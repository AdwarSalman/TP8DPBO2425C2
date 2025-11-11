<!DOCTYPE html>
<html>
<head>
  <title>Add Lecturer</title>
  <link rel="stylesheet" href="public/css/bootstrap.min.css">
</head>
<body class="p-4">
  <h2>Add New Lecturer</h2>
  <form method="post" action="index.php?controller=lecturer&action=create" class="col-md-6">
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>NIDN</label>
      <input type="text" name="nidn" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Phone</label>
      <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Join Date</label>
      <input type="date" name="join_date" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Save</button>
    <a href="index.php?controller=lecturer&action=index" class="btn btn-secondary">Cancel</a>
  </form>
</body>
</html>
