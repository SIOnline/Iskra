<?php 

 class Example {
     
    public function __construct() {
        if ( function_exists('acf_register_block_type') ) {
            $block_name = get_class($this);

            acf_register_block_type([
                    'name' => $block_name,
                    'title' => __($block_name),
                    'description' => __('Example description'),
                    'render_template' => "src/Blocks/$block_name/$block_name.php",
                    'category' => 'header', //
                    'icon' => [
                        'background' => '#7e70af',
                        'foreground' => '#fff',
                        'src' => 'book-alt',
                    ],
                    //keywords => [],
                    'post_types' => ['post', 'page'],
                    'mode' => 'preview', //preview / edit / auto
                    'enqueue_assets' => function(){
                        $block_name = get_class($this);
                        wp_enqueue_style( "$block_name-css", get_template_directory_uri() . "/src/Blocks/$block_name/_$block_name.css", false, '1' );
                        wp_enqueue_script( "$block_name-js", get_template_directory_uri() . "/src/Blocks/$block_name/$block_name.js", [], '', true );
                    },
                    //'supports'
                    'render_callback' => [$this, 'render']
            ]);
        }


            
    }

    public function render() { 
        
        $acf = get_fields();
        $title = $acf['title'] ?? false;

        ?>

        <section class="Example">
            <div class="container">

                <h1>
                    <?php echo $title; ?>
                </h1>

            </div>
        </section>

    <?php 
    }
 }