<nav class="flex p-4 justify-between bg-white">
    <div>
        <a class="text-black text-xl" href="/">
            Image Gallery
        </a>
    </div>
    <div>
        <?php if (count($_SESSION) > 0) : ?>
            <?php if ($_SESSION['is_active'] == true) : ?>
                <a class="capitalize text-blue-700" href="/profile">
                    <?= $_SESSION['login'] ?>
                </a>
                <a href="/logout">Logout</a>
            <?php endif; ?>
        <?php else : ?>
            <a class="capitalize" href="/login" class="navbar-link">
                Login
            </a>
            <a  class="capitalize" href="/register" class="navbar-link">
                Register
            </a>
        <?php endif; ?>
    </div>
</nav>