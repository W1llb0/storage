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



//// forma 2

const showChangeRecordForm = () => {
  const formContainer2 = document.querySelector('#change-record-form-container');
  const overlay2 = document.querySelector('#overlay-2');
  
  // показываем форму и оверлей
  formContainer2.style.display = 'block';
  
  // запускаем анимацию
  formContainer2.animate([
    { height: '0', opacity: '0' },
    { height: 'auto', opacity: '1' }
  ], {
    duration: 500   ,
    easing: 'ease-out',
    fill: 'forwards'
  });
  

  overlay2.style.display = 'block';
  
  // обработчик клика на оверлее
  overlay2.addEventListener('click', hideAddRecordForm);
}

const hideChangeRecordForm = () => {
  const formContainer2 = document.querySelector('#change-record-form-container');
  const overlay2 = document.querySelector('#overlay-2');

  // скрываем форму и оверлей
  formContainer2.style.display = 'none';
  overlay2.style.display = 'none';

  // удаляем обработчик клика на оверлее
  overlay2.removeEventListener('click', hideAddRecordForm);
}

// обрабочик клика на кнопке "Добавить запись"
const changeRecordButton = document.querySelector('#change-record-button');
changeRecordButton.addEventListener('click', showAddRecordForm);