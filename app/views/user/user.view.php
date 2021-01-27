<?php
include dirname(__DIR__, 1) . '/shared/head.php';
include dirname(__DIR__, 1) . '/shared/navigation.php';
?>
<section class="container mx-auto">
    <div class="shadow">
        <h2 class="text-lg text-black"><span class="text-blue-700">
                <?= $username[0]->username ?>
            </span></h2>
        <h2 class="text-md">
            <?= $desc[0]->description?>
        </h2>
    </div>
    <h2 class="text-lg text-black">
        Uploads:
    </h2>
    <div class="flex sm:flex-row flex-col">
        <?php foreach ($photos as $photo): ?>
            <div class="flex flex-col shadow-lg mr-6 mt-6">
                <a href="/image?id=<?php echo $photo->id ?>">
                    <img class="max-w-xs h-72 max-h-72" src="images/<?php echo $photo->file_name ?>" alt="image">
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php
include dirname(__DIR__, 1) . '/shared/footer.php';
?>
