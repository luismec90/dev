/* Bootstrap-tour */


var tourShopPath = new Tour({
    name: 'Tour',
    steps: [
        {
            element: ".one",
            title: "Title",
            content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut ipsum felis. Aliquam molestie ultrices rhoncus. Ut scelerisque velit et sapien sodales pharetra eu eget libero. Curabitur convallis congue justo, a ornare est placerat eget.",
            placement: "bottom"
        },
        {
            element: ".two",
            title: "Title",
            content: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut ipsum felis. Aliquam molestie ultrices rhoncus. Ut scelerisque velit et sapien sodales pharetra eu eget libero. Curabitur convallis congue justo, a ornare est placerat eget.",
            placement: "top"
        }
    ],
    backdrop: true,
    template: "<div class='popover tour'> <div class='arrow'></div> <h3 class='popover-title'></h3> <div class='popover-content'></div> <div class='popover-navigation'> <div class='btn-group'> <button class='btn btn-sm btn-default' data-role='prev'>« Anterior</button> <button class='btn btn-sm btn-default' data-role='next'>Siguiente »</button> </div> <button class='btn btn-sm btn-default' data-role='end'>Finalizar</button> </div> </div>"
});