<?php
$link = get_sub_field( 'link' );
$target = ! empty( $link['target'] ) ? ' target="' . $link['target'] . '"' : '';

if ( $link && $link['target'] == '_blank' ) {
	$target .= ' rel="noopener noreferrer"';
}
?>

<?php if ( $link ) : ?>
<a class="button button-primary" href="<?php echo esc_url( $link['url'] ); ?>"
    <?php echo $target; ?>><?php echo esc_html( $link['title'] ); ?></a>
<?php endif; ?>