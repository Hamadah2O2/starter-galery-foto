<?= $this->extend("layout/base") ?>

<?= $this->section('content') ?>
<?= $this->include('part/nav') ?>
<div class="container mt-5">
    <div class="container-fluid">
        <div class="card">
            <img src="<?= base_url('assets/img/1.jpg') ?>" class="card-img-top" alt="">
            <div class="card-body">
                <span>Ini Gambar</span>
            </div>
        </div>
    </div>
</div>
<div class="m-5"></div>
<?= $this->endSection() ?>