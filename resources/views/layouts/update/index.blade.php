<div class="modal fade" id="updateDataModal{{ $book->id }}" tabindex="-1" role="dialog" aria-labelledby="updateDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="updateDataModalLabel">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('update.book', ['id' => $book->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <!-- Your form fields go here -->
                    <div class="form-group">
                        <label for="title" class="text-light">Judul Buku</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Judul Buku" value="{{ old('title', $book->title) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="image" class="text-light">Gambar</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="story" class="text-light">Cerita</label>
                        <textarea class="form-control" id="story" name="story" placeholder="Enter Cerita" required>{{ old('story', $book->story) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteDataModal{{ $book->id }}">Hapus Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
