export const getImageUrl = (image_file) => {
    let img_path = new URL(`../../images/${image_file}`, import.meta.url)

    return img_path.href
}

    
