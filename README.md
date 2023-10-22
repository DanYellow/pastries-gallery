php -S localhost:8000

squoosh-cli --mozjpeg '{"quality":75,"baseline":false,"arithmetic":false,"progressive":true,"op timize_coding":true,"smoothing":0,"color_space":3,"quant_table":3,"trellis_multipass":false,"trel lis_opt_zero":false,"trellis_opt_table":false,"trellis_loops":1,"auto_subsample":true,"chroma_sub sample":2,"separate_chroma_quality":false,"chroma_quality":75}' -d output ./*

squoosh-cli --mozjpeg '{"quality":75, "chroma_quality":75}' -d output2 ./*

Gallery structure :
patisseries/
    patisseries_name/ (contains images + name.txt file for alternative name)
    patisseries_name.jpg (image to link to the details pages)