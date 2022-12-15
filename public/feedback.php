<?php include 'inc/header-feedback.php'; ?>




<img src="img/logo1.png" class="w-25 mb-3" alt="">
<h2>Past Feedback</h2>

<?php if (empty($feedback)) : ?>
  <p class="lead mt-3">There is no feedback</p>
<?php endif; ?>

<?php foreach ($feedback as $item) : ?>
  <div class="card my-3 w-75">
    <div class="card-body text-center">
      <?php echo $item['body']; ?>
      <div class="text-secondary mt-2">By <?php echo $item['name']; ?> on <?php echo date_format(
                                                                            date_create($item['date']),
                                                                            'g:ia \o\n l jS F Y'
                                                                          ); ?></div>
    </div>
  </div>
<?php endforeach; ?>
<?php include 'inc/footer.php'; ?>