@if( $template->option_status )

    <section {!! $id !!} {!! $classes !!} >

            <div class="grid-container">

                <div class="grid-x grid-margin-x align-center">

                    <div class="cell small-11 medium-10">

                        @php
                            
                        @endphp

                        @if ( $template->post_query == 'most_recent' )

                            @php 
                                
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => $template->number_of_posts_to_show,
                                    'orderby' => "date",
                                    "order" => "desc",
                                    "fields" => 'ids'
                                );

                                $posts = get_posts( $args );

                            @endphp

                        @else

                            @php 
                                $posts = $template->posts_to_show;
                            @endphp

                        @endif

                        @foreach ($posts as $post_id)

                            <div class="grid-x grid-margin-x item">

                                <div class="cell small-12 medium-6">
                                    <img src="{!! get_the_post_thumbnail_url( $post_id ) !!}" alt="" class="">
                                </div>
            
                                <div class="cell small-12 medium-6">
            
                                    <h2><b>{!! get_the_title( $post_id ) !!}</b></h2>
            
                                    {!! wpautop( get_post_field( 'post_content', $post_id ) ); !!}
                                    <hr>
            
                                    <a href="{!! get_permalink( $post_id ) !!}" class="button simple orange">Read More</a>
                                </div>
                            </div><!-- .item -->
                            
                        @endforeach
        
                    </div>

                </div>

            </div>
    
    </section>

@endif