const showAddRecordForm = () => {
  const formContainer = document.querySelector('#add-record-form-container');
  const overlay = document.querySelector('#overlay');
  
  // показываем форму и оверлей
  formContainer.style.display = 'block';
  
  // запускаем анимацию
  formContainer.animate([
    { height: '0', opacity: '0' },
    { height: 'auto', opacity: '1' }
  ], {
    duration: 500   ,
    easing: 'ease-out',
    fill: 'forwards'
  });
  

  overlay.style.display = 'block';
  
  // обработчик клика на оверлее
  overlay.addEventListener('click', hideAddRecordForm);
}

const hideAddRecordForm = () => {
  const formContainer = document.querySelector('#add-record-form-container');
  const overlay = document.querySelector('#overlay');

  // скрываем форму и оверлей
  formContainer.style.display = 'none';
  overlay.style.display = 'none';

  // удаляем обработчик клика на оверлее
  overlay.removeEventListener('click', hideAddRecordForm);
}

// обрабочик клика на кнопке "Добавить запись"
const addRecordButton = document.querySelector('#add-record-button');
addRecordButton.addEventListener('click', showAddRecordForm);