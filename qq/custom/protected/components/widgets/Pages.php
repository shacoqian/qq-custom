<?php
class Pages extends CLinkPager
{
	public function init()
	{
		$this->htmlOptions = array('class' => 'pagination pull-right');
		$this->internalPageCssClass = '';
		$this->selectedPageCssClass = 'active';
		$this->prevPageLabel = '上一页';
		$this->nextPageLabel = '下一页';
		$this->firstPageLabel = '首页';
		$this->lastPageLabel = '末页';
		$this->header = '';
	}
	
	public function run()
	{
		parent::run();
	}
}