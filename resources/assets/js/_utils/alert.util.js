import swal from 'sweetalert2';

export class Alert {
    static success(title = '', text, confirmButtonText = 'Ok') {
        return swal({
            title,
            text,
            type: 'success',
            confirmButtonText
        });
    }

    static warning(title = 'Are you sure?', text = 'You can not reverse this action!', confirmButtonText = 'Yes') {
        return new Promise((resolve, reject) => {
            swal({
                title,
                text,
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText
            }).then(result => {
                if(result.value) {
                    resolve('done');
                }
            })
        })
    }

    static error(title = 'Oops...', text = 'An error occurred. Try again!', confirmButtonText = 'Ok') {
        return swal({
            title,
            text,
            type: 'error',
            confirmButtonText
        });
    }
}
