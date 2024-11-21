
<h2>Edit Kategori</h2>
<form action="/kategori/update/<?php echo $kategori['id_kategori']; ?>" method="POST" class="border p-4 rounded shadow-sm bg-light">
            <div class="mb-3">
                <label for="nama_kategori" class="form-label fw-bold">Nama kategori:</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?php echo $kategori['nama_kategori']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label fw-bold">Deskripsi:</label>
                <input type="deskripsi" name="deskripsi" id="deskripsi" class="form-control" value="<?php echo $kategori['deskripsi']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary fw-bold">Update</button>
            <a href="/kategori/index" class="btn btn-secondary fw-bold">Batal</a>
        </form>
