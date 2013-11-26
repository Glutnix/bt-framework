<?php // print_r($model->messages); ?>
<h2>Add Page</h2>
<form action="<?php $this->formURL(); ?>" method="post" enctype="multipart/form-data">
	<div>
		<label for="title">Title</label>
		<input id="title" name="title" type="text" value="<?php echo $model->data['title']; ?>" >
		<span class="error"><?php echo $model->messages['title']; ?></span>
	</div>
	<div>
		<label for="slug">Slug</label>
		<input id="slug" name="slug" type="text" value="<?php echo $model->data['slug']; ?>" >
		<span class="error"><?php echo $model->messages['slug']; ?></span>
	</div>
	<div>
		<label for="heading">Heading</label>
		<input id="heading" name="heading" type="text" value="<?php echo $model->data['heading']; ?>" >
		<span class="error"><?php echo $model->messages['heading']; ?></span>
	</div>
	<div>
		<label for="description">Description</label>
		<input id="description" name="description" type="text" value="<?php echo $model->data['description']; ?>" >
		<span class="error"><?php echo $model->messages['description']; ?></span>
	</div>
	<div>
		<label for="keywords">Keywords</label>
		<input id="keywords" name="keywords" type="text" value="<?php echo $model->data['keywords']; ?>" >
		<span class="error"><?php echo $model->messages['keywords']; ?></span>
	</div>
	<div>
		<label for="content">Content</label>
		<textarea id="content" name="content" cols="80" rows="5"><?php echo $model->data['content']; ?></textarea>
		<span class="error"><?php echo $this->model->messages['content']; ?></span>
	</div>
	<input type="hidden" name="action" value="add">
	<button>Submit</button>
</form>