<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
@extends('welcome')
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Developer ID</th>
                        <th>Developer Name</th>
                        <th>Efficiency</th>
                        <th><button class="btn btn-primary" onclick="openEditModal()">Create Developer</button></th>
                    </tr>
                </thead>
                <tbody>
    @foreach ($developers as $developer)
        <tr>
            <td>{{ $developer['id'] }}</td>
            <td>{{ $developer['name'] }}</td>
            <td>{{ $developer['efficiency'] }}</td>
            <td>
                <a href="#" class="btn btn-primary btn-sm" onclick="openEditModal('{{ json_encode($developer) }}')">Edit</a>
                <form action="#" method="Delete" class="d-inline" onclick="openDeleteModal(`{{ $developer['id'] }}`)">
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="editDeveloperModal" tabindex="-1" role="dialog" aria-labelledby="editDeveloperModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDeveloperModalLabel">Edit Developer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form >
    <input type="hidden" name="id" value="">
    <div class="form-group">
        <label for="name">Developer Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter developer name">
      </div>
        <div class="form-group">
            <label for="efficiency">Efficiency</label>
            <input type="number" class="form-control" name="efficiency" placeholder="Enter efficiency">
        </div>
</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="deleteDeveloperModal" tabindex="-1" role="dialog" aria-labelledby="deleteDeveloperModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="#" method="DELETE">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteDeveloperModalLabel">Delete Developer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to delete this developer?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancel</button>
        <button type="submit" class="btn btn-danger" id="deleteDeveloper">Yes, delete</button>
      </div>
        </form>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    var idToDelete = null;
    function openEditModal(developer) {
        if (!developer) {
            $('#editDeveloperModal').modal('show');
            return;
        }
        developer = JSON.parse(developer);
        $('#editDeveloperModal').find('input[name="name"]').val(developer.name);
        $('#editDeveloperModal').find('input[name="task_value_key"]').val(developer.task_value_key);
        $('#editDeveloperModal').find('input[name="task_estimated_duration_key"]').val(developer.task_estimated_duration_key);
        $('#editDeveloperModal').find('input[name="task_name_key"]').val(developer.task_name_key);
        $('#editDeveloperModal').find('input[name="url"]').val(developer.url);
        $('#editDeveloperModal').find('input[name="id"]').val(developer.id);

        $('#editDeveloperModal').modal('show');
    }
    function openDeleteModal(id) {
        idToDelete = id;
        $('#deleteDeveloperModal').modal('show');
    }
    $(document).ready(function() {
        $('#saveChanges').click(function() {
            let method = 'POST';
            let url = '/api/developers';
            const id = $('#editDeveloperModal').find('input[name="id"]').val();
            if (id) {
                method = 'PUT';
                url = '/api/developers/' + id;
            }
            var developerData = {
                name: $('#editDeveloperModal').find('input[name="name"]').val(),
                task_value_key: $('#editDeveloperModal').find('input[name="task_value_key"]').val(),
                task_estimated_duration_key: $('#editDeveloperModal').find('input[name="task_estimated_duration_key"]').val(),
                task_name_key: $('#editDeveloperModal').find('input[name="task_name_key"]').val(),
                url: $('#editDeveloperModal').find('input[name="url"]').val(),
            };

            $.ajax({
                url: url,
                type: method,
                data: developerData,
                success: function(response) {
                    $('#editDeveloperModal').modal('hide');
                    window.location.reload();
                },
                error: function(error) {
                    // TODO Handle error
                }
            });
        });
        $('#deleteDeveloper').click(function() {
            $.ajax({
                url: '/api/developers/' + idToDelete,
                type: 'DELETE',
                success: function(response) {
                    $('#deleteDeveloperModal').modal('hide');
                    window.location.reload();
                },
                error: function(error) {
                    // TODO Handle error
                }
            });
        }
    );
    });

</script>
@endsection
</body>
</html>
