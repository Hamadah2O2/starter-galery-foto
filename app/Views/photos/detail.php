<?= $this->extend("layout/base") ?>

<?= $this->section('content') ?>
<?= $this->include('part/nav') ?>
<div class="container my-3">
    <div class="card">
        <div class="row">
            <div class="col-7 bg-secondary rounded-start d-flex justify-content-center">
                <img src="/assets/img/<?= $photo['lokasi_file'] ?>" class="img-fluid" alt="" srcset="">
            </div>
            <div class="col-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="">
                            <h2 class="fw-bold"><?= $photo['judul'] ?> </h2>
                            <span><?= $photo['username'] ?> - <?= $photo['album_name'] ?></span>
                        </div>
                        <span class="text-black-50"><?= date('d - m - Y', strtotime($photo['tanggal'])) ?></span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bolder">Deskripsi:</h5>
                        <?php if (session()->get('user_id') == $photo['user_id']) : ?>
                            <div>
                                <a href="<?= base_url('photos/edit/' . $photo['id']) ?>" class="btn btn-primary"><i class="iconoir-page-edit"></i>Edit</a>
                                <a href="<?= base_url('photos/hapus/' . $photo['id']) ?>" class="btn btn-danger"><i class="iconoir-bin"></i>Hapus</a>
                            </div>
                        <?php endif ?>
                    </div>
                    <p><?= $photo['deskripsi'] ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>