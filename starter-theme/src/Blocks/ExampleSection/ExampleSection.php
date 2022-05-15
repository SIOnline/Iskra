<?php 

 class ExampleSection {
     
    public function __construct() {
        //if ( function_exists('acf_register_block_type') ) {
            acf_register_block_type(
                [
                    'name' => 'ExampleSection',
                    'title' => __('ExampleSection'),
                    'description' => __('ExampleSection description'),
                    'render_template' => 'src/Blocks/ExampleSection/ExampleSection.php',
                    'category' => 'common', //header / content 
                    'icon' => [
                        'background' => '#7e70af',
                        'foreground' => '#fff',
                        'src' => 'book-alt',
                    ],
                    //keywords
                    'post_types' => ['post', 'page'],
                    'mode' => 'preview', //preview / edit / auto
                    'enqueue_assets' => function(){
                        $block_name = get_class($this);
                        wp_enqueue_style( "$block_name-css", get_template_directory_uri() . "/src/Blocks/$block_name/_$block_name.css" );
                        wp_enqueue_script( "$block_name-js", get_template_directory_uri() . "/src/Blocks/$block_name/$block_name.js", [], '', true );
                    },
                    //'supports'
                    'render_callback' => [$this, 'render']

                ]
            );
        //}
    }

    public function render() { 
        
        $acf = get_fields();

        $examplefield = $acf['examplefield'] ?? false;

        ?>

        <section class="ExampleSection">
            <div class="container">

                <h1>
                    examplefield:
                    <?php echo $examplefield; ?>
                </h1>

            </div>
        </section>


    <?php 
    }
 }