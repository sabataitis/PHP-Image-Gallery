<?php
include dirname(__DIR__, 1) . '/shared/head.php';
include dirname(__DIR__, 1) . '/shared/navigation.php';
?>
<section class="container mx-auto">
    <div class="flex sm:flex-row flex-col justify-center">
            <div class="flex flex-col shadow-lg mr-6 mt-6 justify-center">
                <img src="images/<?php echo $photo->file_name ?>" alt="image">
            </div>
    </div>
</section>
<?php
include dirname(__DIR__, 1) . '/shared/footer.php';
?>
