<a href="{{ route('users.edit', $person->id) }}" class="btn btn-primary">EDIT</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{ $person->id }}">
    DELETE
</button>

<form method="POST" action="{{ route('users.destroy', $person->id) }}">
    @csrf
    @method('DELETE')

                <!-- Modal -->
    <div class="modal fade" id="modal-delete-{{ $person->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pengesahan Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Adakah anda bersetuju untuk menghapuskan data ini?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            <button type="submit" class="btn btn-danger">DELETE</button>
        </div>
        </div>
    </div>
    </div>
    
</form>