<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $produk->kode_produk }}">
  Hapus
</button>

<!-- Modal -->
<div class="modal fade" id="delete{{ $produk->kode_produk }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ $produk->kode_produk }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          Yakin ingin menghapus data produk <strong class="text-danger">{{ $produk->nama_produk }} ?</strong>
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="/produk/{{ $produk->kode_produk }}" method="post" class="d-inline">
          @method('delete')
          @csrf
          <button type="submit" class="btn btn-sm btn-danger">Ya, Hapus Data</button>
        </form>
      </div>
    </div>
  </div>
</div>