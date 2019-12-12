<?php

namespace OWID\blocks\prominent_link;

function render($attributes, $content)
{
  $classes = 'wp-block-owid-prominent-link';

  $title = null;
  if (!empty($attributes['title'])) {
    $title = "<h3>{$attributes['title']}"
      . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M190.5 66.9l22.2-22.2c9.4-9.4 24.6-9.4 33.9 0L441 239c9.4 9.4 9.4 24.6 0 33.9L246.6 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.2-22.2c-9.5-9.5-9.3-25 .4-34.3L311.4 296H24c-13.3 0-24-10.7-24-24v-32c0-13.3 10.7-24 24-24h287.4L190.9 101.2c-9.8-9.3-10-24.8-.4-34.3z"/></svg>'
      . '</h3>';
  }

  $figure = null;
  if (!empty($attributes['mediaUrl'])) {
    $img = wp_get_attachment_image($attributes['mediaId'], 'medium_large');
    $figure = "<figure>" . $img . "</figure>";
    $classes .= ' with-image';
  }

  $linkStart = $linkEnd = null;
  if (!empty($attributes['linkUrl'])) {
    $linkStart = '<a href="' . esc_url($attributes['linkUrl']) . '">';
    $linkEnd = '</a>';
  }

  $block = <<<EOD
	<div class="$classes">
		$linkStart
			$title
			<div class="content-wrapper">
				$figure
				<div class="content">
					$content
				</div>
			</div>
		$linkEnd
	</div>
EOD;

  return $block;
}