<?php
	namespace Roli\Bootstrap;
	/**
	 * Bootstrap components
	 */
	class RoliBootstrap
	{
		/**
		 * Bootstrap Modal
		 *
		 * @param mixed $props The modal attributes and properties
		 *
		 * @return string
		 */
		public static function modal(mixed $props)
		{
			$_attr    = [
				"modal"         => ['class' => "modal", 'tabindex' => "-1"],
				"modal-dialog"  => ['class' => "modal-dialog"],
				"modal-content" => ['class' => "modal-content"],
				"modal-header"  => ['class' => "modal-header"],
				"modal-title"   => ['class' => "modal-title"],
				"modal-body"    => ['class' => "modal-body"],
				"modal-footer"  => ['class' => "modal-footer"],
				"close"         => 1
			];
			$skeleton = '
<div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>';
			$modal    = '';

			return $modal;
		}
	}
