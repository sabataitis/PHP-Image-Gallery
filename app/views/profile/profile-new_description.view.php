<?php
include dirname(__DIR__, 1) . '/shared/head.php';
include dirname(__DIR__, 1) . '/shared/navigation.php';
?>
<section class="container mx-auto">
    <div>
        <a href="/profile" class="capitalize text-gray-600">Go back</a>
    </div>
    <form class="flex flex-col" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"
          enctype="multipart/form-data">
        <div class="py-4">
            <textarea class="border-2" name="description" cols="80" rows="5"><?= $description->description ?></textarea>
        </div>
        <div>
            <input type="submit"
                   class="cursor-pointer hover:bg-blue-200 bg-blue-300 text-center py-2 px-4 my-2 mr-2 rounded"
                   value="Save description"
            />
        </div>
    </form>
</section>
<?php
include dirname(__DIR__, 1) . '/shared/footer.php';
?>
