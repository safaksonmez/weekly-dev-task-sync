<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Provider ID</th>
                        <th>Provider Name</th>
                        <th>Task Value Key</th>
                        <th>Task Duration Key</th>
                        <th>Task Name Key</th>
                        <th>Url</th>
                        <th><button class="btn btn-primary" onclick="openEditModal()">Create Provider</button></th>
                    </tr>
                </thead>
                <tbody>
    @foreach ($providers as $provider)
        <tr>
            <td>{{ $provider['id'] }}</td>
            <td>{{ $provider['name'] }}</td>
            <td>{{ $provider['task_value_key'] }}</td>
            <td>{{ $provider['task_estimated_duration_key'] }}</td>
            <td>{{ $provider['task_name_key'] }}</td>
            <td><a href="{{ $provider['url'] }}" target="_blank" style="word-wrap: break-word;">{{ $provider['url'] }}</a></td>
            <td>
                <a href="#" class="btn btn-primary btn-sm" onclick="openEditModal('{{ json_encode($provider) }}')">Edit</a>
                <form action="#" method="Delete" class="d-inline" onclick="openDeleteModal(`{{ $provider['id'] }}`)">
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
<div class="modal fade" id="editProviderModal" tabindex="-1" role="dialog" aria-labelledby="editProviderModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editProviderModalLabel">Edit Provider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form >
    <input type="hidden" name="id" value="">
    <div class="form-group">
        <label for="name">Provider Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter provider name">
      </div>
        <div class="form-group">
            <label for="task_value_key">Task Value Key</label>
            <input type="text" class="form-control" name="task_value_key" placeholder="Enter task value key">
        </div>
        <div class="form-group">
            <label for="task_estimated_duration_key">Task Estimated Duration Key</label>
            <input type="text" class="form-control" name="task_estimated_duration_key" placeholder="Enter task estimated duration key">
        </div>
        <div class="form-group">
            <label for="task_name_key">Task Name Key</label>
            <input type="text" class="form-control" name="task_name_key" placeholder="Enter task name key">
        </div>
        <div class="form-group">
            <label for="url">Url</label>
            <input type="text" class="form-control" name="url" placeholder="Enter url">
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
<div class="modal fade" id="deleteProviderModal" tabindex="-1" role="dialog" aria-labelledby="deleteProviderModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="#" method="DELETE">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteProviderModalLabel">Delete Provider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Are you sure you want to delete this provider?</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, cancel</button>
        <button type="submit" class="btn btn-danger" id="deleteProvider">Yes, delete</button>
      </div>
        </form>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.4.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    var idToDelete = null;
    function openEditModal(provider) {
        if (!provider) {
            $('#editProviderModal').modal('show');
            return;
        }
        provider = JSON.parse(provider);
        $('#editProviderModal').find('input[name="name"]').val(provider.name);
        $('#editProviderModal').find('input[name="task_value_key"]').val(provider.task_value_key);
        $('#editProviderModal').find('input[name="task_estimated_duration_key"]').val(provider.task_estimated_duration_key);
        $('#editProviderModal').find('input[name="task_name_key"]').val(provider.task_name_key);
        $('#editProviderModal').find('input[name="url"]').val(provider.url);
        $('#editProviderModal').find('input[name="id"]').val(provider.id);

        $('#editProviderModal').modal('show');
    }
    function openDeleteModal(id) {
        idToDelete = id;
        $('#deleteProviderModal').modal('show');
    }
    $(document).ready(function() {
        $('#saveChanges').click(function() {
            let method = 'POST';
            let url = '/api/providers';
            const id = $('#editProviderModal').find('input[name="id"]').val();
            if (id) {
                method = 'PUT';
                url = '/api/providers/' + id;
            }
            var providerData = {
                name: $('#editProviderModal').find('input[name="name"]').val(),
                task_value_key: $('#editProviderModal').find('input[name="task_value_key"]').val(),
                task_estimated_duration_key: $('#editProviderModal').find('input[name="task_estimated_duration_key"]').val(),
                task_name_key: $('#editProviderModal').find('input[name="task_name_key"]').val(),
                url: $('#editProviderModal').find('input[name="url"]').val(),
            };

            $.ajax({
                url: url,
                type: method,
                data: providerData,
                success: function(response) {
                    $('#editProviderModal').modal('hide');
                    window.location.reload();
                },
                error: function(error) {
                    // TODO Handle error
                }
            });
        });
        $('#deleteProvider').click(function() {
            $.ajax({
                url: '/api/providers/' + idToDelete,
                type: 'DELETE',
                success: function(response) {
                    $('#deleteProviderModal').modal('hide');
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
</body>
</html>
