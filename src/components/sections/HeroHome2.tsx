"use client";

import { useState, useCallback, useRef } from "react";
import Image from "next/image";
import { motion } from "motion/react";

const ease = [0.23, 1, 0.32, 1] as const;

const trustStats = [
  { value: "500+", label: "Brands Scaled" },
  { value: "15+", label: "Years Experience" },
  { value: "98%", label: "Client Retention" },
  { value: "4.9/5", label: "Rating" },
];

export default function HeroHome2() {
  const [mousePos, setMousePos] = useState({ x: 50, y: 50 });
  const sectionRef = useRef<HTMLElement>(null);

  // Mouse tracking for spotlight
  const handleMouseMove = useCallback((e: React.MouseEvent) => {
    if (!sectionRef.current) return;
    const rect = sectionRef.current.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width) * 100;
    const y = ((e.clientY - rect.top) / rect.height) * 100;
    setMousePos({ x, y });
  }, []);

  return (
    <section
      ref={sectionRef}
      onMouseMove={handleMouseMove}
      className="relative w-full h-screen min-h-[800px] flex flex-col justify-end overflow-hidden pb-16 pt-32 bg-[#111]"
    >
      {/* Background Image layer */}
      <div className="absolute inset-0 z-0 flex items-center justify-center">
        <Image
          src="/home2-bg-2.png"
          alt="TML Agency creative team working on brand strategy"
          fill
          sizes="100vw"
          className="object-cover object-center opacity-50 mix-blend-screen"
          priority
        />
      </div>

      {/* Film Grain / Noise Overlay */}
      <div className="absolute inset-0 z-[1] noise-overlay mix-blend-overlay opacity-30"></div>

      {/* Red/Orange Central Halo */}
      <div
        className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-[40%] w-[500px] md:w-[800px] lg:w-[1000px] h-[500px] md:h-[800px] lg:h-[1000px] rounded-full z-[2] opacity-70 mix-blend-color-dodge pointer-events-none"
        style={{
          background: 'radial-gradient(circle, rgba(235, 60, 20, 0.4) 0%, rgba(200, 30, 0, 0.1) 50%, transparent 70%)'
        }}
      />

      {/* Mouse-following spotlight */}
      <div
        className="absolute inset-0 z-[2] pointer-events-none opacity-40 transition-opacity duration-300"
        style={{
          background: `radial-gradient(800px circle at ${mousePos.x}% ${mousePos.y}%, rgba(255,69,0,0.06), transparent 50%)`,
        }}
      />

      {/* Gradient fade from bottom to make text readable */}
      <div className="absolute inset-0 z-[3] bg-gradient-to-t from-[#050505] via-[#050505]/80 to-transparent h-full"></div>

      {/* Content Container */}
      <div className="relative z-10 w-full max-w-7xl mx-auto px-6 lg:px-12 flex flex-col h-full">

        {/* Spacer to push content down and reveal bg image */}
        <div className="min-h-[200px] md:min-h-0 flex-1" />

        {/* Main Typography */}
        <div className="max-w-5xl mb-4">
          <motion.h1
            initial={{ opacity: 0, y: 30 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.9, ease }}
            className="text-[2rem] sm:text-4xl md:text-5xl lg:text-7xl font-medium leading-[1.05] tracking-tight text-white font-sans mb-3 text-balance"
          >
            Build <span className="text-[#ff4500]">brands</span>.{" "}
            Drive growth.
          </motion.h1>
          <motion.p
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.15, ease }}
            className="text-base sm:text-lg md:text-2xl lg:text-3xl text-white/70 font-sans tracking-tight leading-snug font-normal text-balance"
          >
            A full-service branding &amp; marketing agency for ambitious businesses.
          </motion.p>
        </div>

        {/* CTA Buttons */}
        <motion.div
          initial={{ opacity: 0, y: 16 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.7, delay: 0.3, ease }}
          className="flex flex-row gap-3 sm:gap-4 mb-10"
        >
          <motion.a
            href="/contact"
            whileHover={{
              scale: 1.03,
              boxShadow: "0 0 40px rgba(255,69,0,0.35), 0 0 80px rgba(255,69,0,0.15)",
            }}
            whileTap={{ scale: 0.97 }}
            transition={{ type: "spring", stiffness: 400, damping: 17 }}
            className="relative inline-block rounded-xl bg-[#ff4500] px-5 sm:px-8 py-4 text-xs sm:text-sm font-semibold text-white text-center overflow-hidden group"
          >
            <span className="relative z-10 inline-flex items-center gap-2">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              Say Hi, Don&apos;t Be Shy
            </span>
            {/* Hover glow overlay */}
            <span className="absolute inset-0 bg-gradient-to-r from-[#ff5a1f] to-[#ff4500] opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
          </motion.a>
          <motion.a
            href="#portfolio"
            whileHover={{
              scale: 1.03,
              backgroundColor: "rgba(255,255,255,0.06)",
              borderColor: "rgba(255,255,255,0.15)",
            }}
            whileTap={{ scale: 0.97 }}
            transition={{ type: "spring", stiffness: 400, damping: 17 }}
            className="inline-block rounded-xl border border-white/[0.08] bg-white/[0.03] px-5 sm:px-8 py-4 text-xs sm:text-sm font-semibold text-white/80 text-center backdrop-blur-sm hover:text-white transition-colors"
          >
            <span className="inline-flex items-center gap-2">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              See Our Work
            </span>
          </motion.a>
        </motion.div>

        {/* Separator Line */}
        <motion.div
          initial={{ scaleX: 0 }}
          animate={{ scaleX: 1 }}
          transition={{ duration: 1.2, delay: 0.5, ease }}
          className="w-full h-[1px] bg-gradient-to-r from-white/30 to-transparent mb-8 origin-left"
        />

        {/* Trust Bar */}
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          transition={{ duration: 0.8, delay: 0.7, ease }}
          className="flex flex-wrap items-center gap-6 md:gap-0 mb-6"
        >
          {trustStats.map((stat, i) => (
            <span key={stat.label} className="flex items-center gap-3 md:gap-0">
              <span className="flex items-center gap-3">
                {/* Pulsing dot */}
                <motion.span
                  className="w-1.5 h-1.5 rounded-full bg-[#ff4500] hidden sm:block"
                  animate={{
                    boxShadow: [
                      "0 0 3px rgba(255,69,0,0.4)",
                      "0 0 10px rgba(255,69,0,0.6)",
                      "0 0 3px rgba(255,69,0,0.4)",
                    ],
                  }}
                  transition={{
                    duration: 2,
                    repeat: Infinity,
                    ease: "easeInOut",
                    delay: i * 0.3,
                  }}
                />
                <span className="text-sm md:text-base font-bold text-white/90 tracking-tight">
                  {stat.value}
                </span>
                <span className="text-[10px] md:text-xs text-white/35 tracking-[0.1em] uppercase font-medium">
                  {stat.label}
                </span>
              </span>
              {i < trustStats.length - 1 && (
                <span className="h-4 w-[1px] bg-white/10 mx-6 hidden md:block" />
              )}
            </span>
          ))}
        </motion.div>

        {/* Bottom Metadata / Description */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-12 mt-2">
          <motion.div
            initial={{ opacity: 0, y: 14 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.8, ease }}
          >
            <p className="text-[10px] md:text-xs text-white/50 tracking-widest uppercase font-semibold mb-4">
              Full-service agency
            </p>
            <p className="text-sm text-white/50 leading-relaxed">
              Strategy, design, and performance marketing — everything your brand needs to stand out and scale.
            </p>
          </motion.div>
          <motion.div
            initial={{ opacity: 0, y: 14 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.6, delay: 0.9, ease }}
          >
            <p className="text-[10px] md:text-xs text-white/50 tracking-widest uppercase font-semibold mb-4">
              How we work
            </p>
            <p className="text-sm text-white/50 leading-relaxed">
              No silos. No handoffs. Just one team driving real, measurable growth across every channel.
            </p>
          </motion.div>
        </div>
      </div>

      {/* Scroll Indicator */}
      <motion.div
        initial={{ opacity: 0 }}
        animate={{ opacity: 1 }}
        transition={{ duration: 0.8, delay: 1.2, ease }}
        className="absolute bottom-8 left-1/2 -translate-x-1/2 z-10"
      >
        <motion.div
          animate={{ y: [0, 8, 0] }}
          transition={{ repeat: Infinity, duration: 1.5, ease: "easeInOut" }}
          className="flex flex-col items-center gap-2"
        >
          <span className="text-[9px] text-white/30 tracking-[0.2em] uppercase">Scroll</span>
          <svg
            width="16"
            height="16"
            viewBox="0 0 16 16"
            fill="none"
            className="text-white/30"
          >
            <path
              d="M4 6L8 10L12 6"
              stroke="currentColor"
              strokeWidth="1.5"
              strokeLinecap="round"
              strokeLinejoin="round"
            />
          </svg>
        </motion.div>
      </motion.div>
    </section>
  );
}
