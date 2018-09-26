<div class="wrap">
  <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
  <p><?php esc_html_e( 'This highlights what I have learned about PHP and Wordpress', 'rfwplugin' ); ?></p>
  <p>
    <strong style="color: #62c594; font-weight: 700;">LINK: </strong><a href="https://www.udemy.com/wordpress-theme-and-plugin-development-course/learn/v4/t/lecture/9648500?start=0" target="
_blank">Wordpress Theme and Plugin Development</a>
  </p>
  <hr>

  <!-- Grabbing Options -->
  <h1><?php esc_html_e('Grabbing Options','rfwplugin'); ?></h1>
  <p> Use this code to grab options:  </p>
  <div class="code-wrapper"><code>
      get_option('option-function');
  </code></div>
  <br>

  <!-- Arrays -->
  <h1><?php esc_html_e('Arrays','rfwplugin'); ?></h1>
  <p>Call a variable and loop using foreach</p>
  <div class="code-wrapper inline-f flt-l m-20px-r"><code>
<br>
    <p>< ?php $options = get_option('option-function'); ?><br>
      < ?php foreach($options as $option): ?><br>
      < ?php echo $option;?><br>
      < ?php endforeach;?>

    </p><br>

  </code></div>
  <?php $options = get_option('rfwplugin_option'); ?>
    <h2><?php esc_html_e('All Options','rfwplugin') ?></h2>

    <ul>
      <?php foreach($options as $option): ?>
        <li><?php echo $option; ?></li>
      <?php endforeach; ?>
    </ul>
  <?php if (array_key_exists('name', $options)): ?>
    <h2><?php esc_html_e('Specific Options','rfwplugin') ?></h2>
    <p><?php esc_html_e($options['name']); ?></p>
  <?php endif; ?>



</div>
