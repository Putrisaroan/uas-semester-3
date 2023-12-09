
<div class="modal fade" id="deleteDataModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteDataModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
                <form action="{{ route('destroy.book', ['id' => $book->id]) }}" method="post">
                    @csrf
                    @method('DELETE') <!-- Use DELETE method for destroying -->
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>
