

export function numberFromLocale(input, locale = "id-ID") {
  if (input === null || input === undefined) return null;
  let str = String(input).trim();
  if (str === "") return null;

  // ambil pemisah ribuan & desimal sesuai locale
  const parts = new Intl.NumberFormat(locale).formatToParts(12345.6);
  const group = parts.find((p) => p.type === "group")?.value || ".";
  const decimal = parts.find((p) => p.type === "decimal")?.value || ",";

  // hapus pemisah ribuan
  str = str.split(group).join("");
  // ubah desimal jadi titik
  if (decimal !== ".") str = str.replace(decimal, ".");

  const num = parseFloat(str);
  return isNaN(num) ? null : num;
}