<ul>
@foreach($childs as $ch)
	<li>
	    {{ $ch->grp_desc }}
	@if(count($ch->childs))
            @include('ControlPanels.manageGrpChild',['childs' => $ch->childs])
        @endif
	</li>
@endforeach
</ul>