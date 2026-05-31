/**
 * Format price/currency to Indonesian Rupiah format with thousands separator
 * @param price - The numeric price value
 * @returns Formatted price string (e.g., "1.000.000")
 */
export function formatPrice(price: number): string {
const num = Number(price);

  if (Number.isNaN(num)) {
    return '0';
  }
  
   return num.toLocaleString('id-ID', {
    minimumFractionDigits: 0,
    maximumFractionDigits: 0,
  });
}


/**
 * Format currency with Rp prefix
 * @param price - The numeric price value
 * @returns Formatted currency string (e.g., "Rp 1.000.000")
 */
export function formatCurrency(price: number): string {
  return `Rp ${formatPrice(price)}`;
}
/**
 * Parse formatted price string back to number
 * @param formattedPrice - The formatted price string
 * @returns Numeric value
 */
export function parseFormattedPrice(formattedPrice: string): number {
  return parseInt(formattedPrice.replace(/\D/g, ''), 10) || 0;
}
