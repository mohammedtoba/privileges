<ul>
@foreach($childs as $child)
	<li>
	    {{ $child->dept_nam }}
	@if(count($child->childs))
            @include('ControlPanels.manageChild',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>