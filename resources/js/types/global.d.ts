export {};

declare global {
  interface Window {
    CONFIG: {
      APP_NAME: string;
      // Definisikan properti lain dari CONFIG di sini jika ada
    };
    CONSTANTS: {
      // Definisikan properti dari CONSTANTS di sini jika ada
    };
  }
}
