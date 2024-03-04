<?= $this->extend("layout/base") ?>

<?= $this->section('content') ?>
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="card" style="width:340px">
      <div class="card-header">
        <h2 class="card-title">Login</h2>
      </div>
      <div class="card-body">
        <?= $this->include('part/alert') ?>
        <form action="<?= base_url('auth/login') ?>" method="post">
            <input type="text" name="username" class="form-control mb-3" id="username" value="<?= old('username') ?>" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" id="password" placeholder="Password" required>
            <input type="submit" name="submit" class="btn btn-primary w-100 mb-3" id="submit" value="Login" >
            <span>
              Belum mempunyai akun? <a href="<?= base_url('auth/register') ?>">Registrasi</a><br>
              Kembali ke <a href="<?= base_url() ?>">Beranda</a>
            </span>
        </form>
      </div>
    </div>
</div>
<?= $this->endSection() ?>