<?= $this->extend("layout/base") ?>

<?= $this->section('content') ?>
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="card" style="width:340px">
      <div class="card-header">
        <h2 class="card-title">Registrasi</h2>
      </div>
      <div class="card-body">
        <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
        </div>
        <?php endif ?>
        <form action="<?= base_url('auth/register') ?>" method="post">
            <input type="text" name="username" class="form-control mb-3" id="username" value="<?= old("username") ?>" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" id="password" placeholder="Password" required>
            <input type="password" name="cpassword" class="form-control mb-3" id="cpassword" placeholder="Confirm Password" required>
            <input type="email" name="email" class="form-control mb-3" id="email" value="<?= old("email") ?>" placeholder="email" required>
            <input type="text" name="nama_lengkap" class="form-control mb-3" id="nama_lengkap" value="<?= old("nama_lengkap") ?>" placeholder="Nama Lengkap" required>
            <textarea name="alamat" class="form-control mb-3" id="alamat" placeholder="Alamat" required><?= old("alamat") ?></textarea>
            <input type="submit" name="submit" class="btn btn-primary w-100 mb-3" id="submit" value="Registrasi" >
            <span>
              Sudah mempunyai akun? <a href="<?= base_url('auth/login') ?>">Login</a><br>
              Kembali ke <a href="<?= base_url() ?>">Beranda</a>
            </span>
        </form>
      </div>
    </div>
</div>
<?= $this->endSection() ?>