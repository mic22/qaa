var Tags=function(i, c)
{
	this.input=i;
	this.tags=new Array();
	this.container=c;
}

Tags.prototype.render=function()
{
	$(this.container).empty();
	for(var i=0; i<this.tags.length; i++)
	{
		if(this.tags[i]!='')
		{
			var div=document.createElement('div');
			div.className='tag';
			var tag_text=document.createTextNode(this.tags[i]);
			div.appendChild(tag_text);
			$(this.container).append(div);
		}
	}
	this.tags;//pakować to input hidden i wio, albo ajax
}
		
Tags.prototype.process=function()
{
	var a=this;
	$(this.input).keyup(function()
	{
		var value=$(this).val()
		if(value!='')
			a.tags=value.split(" ");
		a.render();
	});
}

function init_tags(input, container)
{
	tags=new Tags(input, container);
	tags.process();
}
