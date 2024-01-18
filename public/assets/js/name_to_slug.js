function nameToSlug(name) {
    // Convert to lowercase
    let slug = name.toLowerCase();

    // Remove accents
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');

    // Remove non-alphanumeric characters (except dashes)
    slug = slug.replace(/[^a-z0-9-_\s+]/g, '');

    // Replace any whitespace with one dash
    slug = slug.replace(/\s+|_/g, '-');        

    // Replace multiple dash with one dash
    slug = slug.replace(/-+/g, '-');

    // Remove dash at start and end of string
    slug = slug.replace(/^-|-$/g, '');

    return slug;
}
