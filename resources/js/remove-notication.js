const TIME = 2000;

export const removeNotification = () => {
    const notificationStatus = document.querySelector('#notificationStatus');
    if (notificationStatus !== null) {
        setTimeout(() => {
            notificationStatus.remove();
        }, TIME);
    }
}