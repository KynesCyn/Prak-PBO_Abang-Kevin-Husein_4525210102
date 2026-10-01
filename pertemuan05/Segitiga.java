
public class Segitiga extends BangunDatar {

    private final double a, b, c;

    public Segitiga(double a, double b, double c) {
        super("Segitiga");
        if (a <= 0 || b <= 0 || c <= 0) {
            throw new IllegalArgumentException("Sisi harus lebih besar dari 0");
        }
        if (a + b <= c || a + c <= b || b + c <= a) {
            throw new IllegalArgumentException("Ketiga sisi tidak membentuk segitiga yang valid");
        }
        this.a = a; this.b = b; this.c = c;
    }

    @Override public double luas() {
        double s = keliling() / 2;
        return Math.sqrt(s * (s - a) * (s - b) * (s - c));
    }

    @Override public double keliling() { 
        return a + b + c; 
    }
}