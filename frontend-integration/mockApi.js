import axios from 'axios';

const API_BASE_URL = import.meta.env.VITE_API_BASE_URL || 'http://127.0.0.1:8000/api';

const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },
});

api.interceptors.request.use((config) => {
  const user = JSON.parse(localStorage.getItem('authUser') || 'null');
  if (user?.name) config.headers['X-User-Name'] = user.name;
  if (user?.email) config.headers['X-User-Email'] = user.email;
  return config;
});

const data = (promise) => promise.then((res) => res.data);

const mockApi = {
  // Books
  getBooks: () => data(api.get('/books')),
  getBookByCode: (code) => data(api.get(`/books/${encodeURIComponent(code)}`)),
  createBook: (book) => data(api.post('/books', book)),
  updateBook: (code, payload) => data(api.put(`/books/${encodeURIComponent(code)}`, payload)),
  deleteBook: (code) => data(api.delete(`/books/${encodeURIComponent(code)}`)),

  // Readers
  getReaders: () => data(api.get('/readers')),
  getReaderById: (id) => data(api.get(`/readers/${encodeURIComponent(id)}`)),
  createReader: (reader) => data(api.post('/readers', reader)),

  // Loans
  getLoans: () => data(api.get('/loans')),
  getLoanById: (id) => data(api.get(`/loans/${encodeURIComponent(id)}`)),
  createLoan: (loan) => data(api.post('/loans', loan)),
  updateLoan: (id, payload) => data(api.put(`/loans/${encodeURIComponent(id)}`, payload)),

  // Fines
  getFines: () => data(api.get('/fines')),
  createFine: (fine) => data(api.post('/fines', fine)),
  markFinePaid: (id) => data(api.patch(`/fines/${encodeURIComponent(id)}/paid`)),

  // Reservations
  getReservations: () => data(api.get('/reservations')),
  createReservation: (reservation) => data(api.post('/reservations', reservation)),

  // Audit Logs
  getAuditLogs: () => data(api.get('/audit-logs')),
  addAuditLog: (action, details) => data(api.post('/audit-logs', { action, details })),

  // Notifications
  getNotifications: () => data(api.get('/notifications')),
  markNotificationRead: (id) => data(api.patch(`/notifications/${encodeURIComponent(id)}/read`)),
  markAllNotificationsRead: () => data(api.patch('/notifications/read-all')),
  addNotification: (title, message, type = 'info') => data(api.post('/notifications', { title, message, type })),

  // Auth
  login: async (email, password) => {
    const user = await data(api.post('/auth/login', { email, password }));
    localStorage.setItem('authUser', JSON.stringify(user));
    return user;
  },
  logout: async () => {
    await data(api.post('/auth/logout'));
    localStorage.removeItem('authUser');
  },
  changePassword: (current, newPass) => {
    const user = JSON.parse(localStorage.getItem('authUser') || 'null');
    return data(api.post('/auth/change-password', { email: user?.email, current, newPass }));
  },
  updateProfile: async (user) => {
    const updated = await data(api.put('/auth/profile', user));
    localStorage.setItem('authUser', JSON.stringify(updated));
    return updated;
  },

  // Suppliers
  getSuppliers: () => data(api.get('/suppliers')),
  getSupplierById: (id) => data(api.get(`/suppliers/${encodeURIComponent(id)}`)),

  // Reports
  getReportSummary: () => data(api.get('/reports/summary')),
  getMonthlyLoans: () => data(api.get('/reports/monthly-loans')),

  // For old reset button usage. Backend reset should be done with migrate:fresh --seed.
  resetData: () => {
    localStorage.clear();
    window.location.reload();
  },
};

export default mockApi;
