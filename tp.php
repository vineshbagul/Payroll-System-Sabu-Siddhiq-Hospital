<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Test page</title>
</head>

<body>
  <!-- Alert -->
  <div class="alert" role="alert" id="buttonAlert">
    <strong>Success!</strong> You just showed an alert.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
  </div>

  <!-- Submit Button -->
  <div class="form-group">
    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter" id="modalButton">Click me</a>
  </div>
</body>

<script>
  

  $(document).ready(function() {
  $("#buttonAlert").hide()
  $("#modalButton").click(function() {
    $("#buttonAlert").show()
  })
})
</script>

</html>