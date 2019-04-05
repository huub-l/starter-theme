@if( $template->option_status )

    <section {!! $id !!} {!! $classes !!} {!! $style !!} >

        @if( $template->option_background == 'Video' && !is_null( $template->option_background_video ) )
    
            @include( 'partials.video-background', [ 'video' => $template->option_background_video ] )

        @endif
        
        @if( $template->option_include_template_header )
        
                @include( 'partials.template-header', [ 'headline' => $template->option_template_headline, 'subheadline' => $template->option_template_subheadline ] )
        
        @endif {{-- $option_include_template_header --}}

        @if( !empty( $template->template_columns ) )

            <div class="grid-container">
                <div class="main grid-x grid-margin-x {{ "align-" . $template->option_x_alignment . " align-" . $template->option_y_alignment . " has-" . count( $template->template_columns ) . "-cols" }} ">

                    @foreach( $template->template_columns as $key => $column )

                        @php $width = ($columns_width != null) ? explode( '_', $columns_width )[$key] : 12 / count( $template->template_columns ); @endphp
                        @php $id = ( $column->option_html_id ) ? 'id="' . $column->option_html_id . '"' : '' @endphp
                        @php $custom_classes = ( $column->option_html_classes ) ? " " . $column->option_html_classes : '' @endphp

                        <div {!! $id !!} class="cell small-11 medium-{{ $width . ' i-' . $key }} {{ $column->option_mobile_sort_order }}{{ $custom_classes }}" >                            <div class="inner">

                                @if( !empty( $column->modules ) )

                                    @include( 'switches.modules' )
                                
                                @endif {{--  !empty( $column->modules --}}

                            </div> {{-- inner --}}
                        </div> {{-- cell --}}
                        
                    @endforeach {{-- $columns as $key => $column --}}

                </div> {{-- main --}}
            </div>  {{-- grid-container --}}

        @endif {{-- !empty( $columns ) --}}

    </section>

@endif